<?php

namespace App;

class Store
{
    private static $instance;

    /**
     * Дескриптор соединения с базой
     * @var mysqli
     */
    private $db;

    private function __construct()
    {
        $this->db = Db::instance();
    }

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Возвращает все новости
     * @return \Traversable
     */
    public function getNews()
    {
        $newsSql = "SELECT * FROM news";
        return $this->db->query($newsSql) ?: [];
    }

    /**
     * Возвращает все новости с категориями
     * @return \Traversable
     */
    public function getNewsWithCategories()
    {
        $news = $this->getNews();

        return $this->makeNewsWithCategories($news);
    }

    /**
     * Возвращает найденные новости с категориями
     * @return \Traversable
     */
    public function searchNewsWithCategories($search)
    {
        $news = $this->search('news', ['head' => $search]);

        return $this->makeNewsWithCategories($news);
    }

    /**
     * Добавляет категории к новостям
     * @param $news Новости
     * @return Array Новости с категориями
     */
    public function makeNewsWithCategories($news)
    {
        $categories = $this->getCategoriesForNews($news);

        $indexedCategories = [];
        foreach ($categories as $item) {
            $id = $item['news_id'];
            $indexedCategories[$id][] = $item;
        }

        $nestedNews = [];
        foreach ($news as $item) {
            $id = $item['id'];
            $item['categories'] = isset($indexedCategories[$id]) ? $indexedCategories[$id] : [];
            $nestedNews[] = $item;
        }

        return $nestedNews ?: [];
    }

    /**
     * Возвращает одну новость по id
     * @param $id
     * @return Array
     */
    public function getNewsSingle($id)
    {
        return $this->getById('news', $id);
    }

    /**
     * Возвращает одну новость
     * @return Array
     */
    public function getLastNewsSingle()
    {
        return $this->getLast('news');
    }

    /**
     * Возвращает последние N новостей
     * @param $count Количество
     * @return Array
     */
    public function getLastNews($count)
    {
        return $this->getLastN('news', $count);
    }

    /**
     * Возвращает один обзор по id
     * @param $id
     * @return Array
     */
    public function getReview($id)
    {
        return $this->getById('reviews', $id);
    }
    
     public function getNews2($id)
    {
         return $this->getById('news', $id);
    }

    /**
     * Возвращает один обзор
     * @return Array
     */
    public function getLastReview()
    {
        return $this->getLast('reviews');
    }

    /**
     * Возвращает последние N обзоров
     * @param $count Количество
     * @return Array
     */
    public function getLastReviews($count)
    {
        return $this->getLastN('reviews', $count);
    }

    /**
     * Возвращает одну новость с категориями
     * @return Array
     */
    public function getNewsSingleWithCategories($id)
    {
        $result = $this->getNewsSingle($id);
        if ($result) {
            $categories = $this->getCategoriesForNews([$result]);
            $result['categories'] = $categories ? $categories->fetch_all(MYSQLI_ASSOC) : [];
        }
        return $result;
    }

    /**
     * Возвращает все обзоры
     * @return \Traversable
     */
    public function getReviews()
    {
        $sql = "SELECT * FROM reviews";
        return $this->db->query($sql) ?: [];
    }

    /**
     * Возвращает категории новостей
     * @return \Traversable
     */
    public function getNewsCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->db->query($sql) ?: [];
    }

    /**
     * Вставляет в базу новость
     * @param  Array $newsItem Новость
     * @return
     */
    public function insertNews($newsItem)
    {
        return $this->insert('news', $newsItem);
    }

    /**
     * Вставляет в базу обзор
     * @param  Array $newsItem Новость
     * @return
     */
    public function insertReview($review)
    {
        return $this->insert('reviews', $review);
    }

    /**
     * Обновляет новость в базе
     * @param  Array $newsItem Новость с id
     * @return
     */
    public function updateNews($newsItem)
    {
        return $this->update('news', $newsItem);
    }

    /**
     * Обновляет обзор в базе
     * @param  Array $review Обзор с id
     * @return
     */
    public function updateReview($review)
    {
        return $this->update('reviews', $review);
    }

    /**
     * Категории для переданных новостей
     * @param  \mysqli_result $news Новости
     * @return \Traversable         Категории
     */
    private function getCategoriesForNews($news)
    {
        $ids = [];
        foreach ($news as $item) {
            $ids[] = $item['id'];
        }
        if (!empty($ids)) {
            $ids = implode(", ", (array) $ids);
            $categoriesSql = "SELECT `categories`.*, `categories_news`.`news_id` FROM `categories`
            INNER JOIN `categories_news` ON `categories_news`.`category_id` = `categories`.`id`
            WHERE `categories_news`.`news_id` IN ({$ids})";
            $categories = $this->db->query($categoriesSql) ?: [];
        } else {
            $categories = [];
        }
        return $categories;
    }

    /**
     * Вставляет ассоциативный массив в таблицу
     * @param  string  $table  Название таблицы
     * @param  array   $item   Вставляемый массив
     * @return
     */
    public function insert($table, array $item)
    {
        $keys = [];
        $values = [];
        foreach ($item as $key => $value) {
            $keys[] = $this->wrapColumn($key);
            $values[] = $this->wrapString($value);
        }
        $table = $this->wrapColumn($table);

        $sql = "INSERT INTO " . $table . " (" . implode(", ", $keys) .
            ") VALUES (". implode(", ", $values) . ")";

        return $this->db->query($sql);
    }

    /**
     * Обновляет в таблице запись, соответствующую id в ассоциативном массиве
     * @param  string  $table  Название таблицы
     * @param  array   $item   Обновляемый массив
     * @return
     */
    public function update($table, array $item)
    {
        $pairs = [];
        foreach ($item as $key => $value) {
            if ($key != 'id') {
                $pairs[] = $this->wrapColumn($key) . ' = ' . $this->wrapString($value);
            }
        }
        $table = $this->wrapColumn($table);

        $sql = "UPDATE " . $table . " SET " . implode(", ", $pairs) .
            " WHERE `id` = " . (int) $item['id'];

        return $this->db->query($sql);
    }

    /**
     * Возвращает одну строку таблицы по id
     * @param  string $table
     * @param $id
     * @return
     */
    public function getById($table, $id)
    {
        $table = $this->wrapColumn($table);
        $sql = "SELECT * FROM " . $table . " WHERE id = " . (int) $id . " LIMIT 1";
        $result = $this->db->query($sql);
        return $result ? $result->fetch_assoc() : false;
    }

    /**
     * Возвращает одну строку таблицы
     * @param  string $table
     * @return
     */
    public function getLast($table)
    {
        $table = $this->wrapColumn($table);
        $sql = "SELECT * FROM " . $table . " ORDER BY `id` DESC LIMIT 1";
        $result = $this->db->query($sql);
        return $result ? $result->fetch_assoc() : false;
    }

    /**
     * Возвращает последние строки таблицы
     * @param  string $table
     * @param $count
     * @return \Traversable
     */
    public function getLastN($table, $count)
    {
        $table = $this->wrapColumn($table);
        $sql = "SELECT * FROM " . $table . " ORDER BY `id` DESC LIMIT " . (int) $count;
        return $this->db->query($sql) ?: [];
    }

    /**
     * Поиск по таблице
     * @param  string $table Имя таблицы
     * @param  array $pairs Пары поиска поле => строка
     * @return
     */
    public function search($table, array $pairs)
    {
        $table = $this->wrapColumn($table);
        $sql = "SELECT * FROM " . $table;

        $column = array_keys($pairs)[0];
        $value = array_shift($pairs);
        $column = $this->wrapColumn($column);
        $tokens = $this->prepareSearch($value);

        $token = array_shift($tokens);
        $sql .= " WHERE " . $column . " RLIKE " . $token;

        foreach ($tokens as $token) {
            $sql .= " AND " . $column . " RLIKE " . $token;
        }

        foreach ($pairs as $key => $value) {
            $column = $this->wrapColumn($key);
            $tokens = $this->prepareSearch($value);
            foreach ($tokens as $token) {
                $sql .= " AND " . $column . " RLIKE " . $token;
            }
        }

        return $this->db->query($sql) ?: [];
    }

    /**
     * Разбивает строку поиска на токены
     * @param  string $value Строка поиска
     * @return Array
     */
    private function prepareSearch($value)
    {
        if (preg_match("#^[ ]+$#", $value)) {
            return [];
        }
        $search = [',', '.', '\t'];
        $replace = ' ';
        $value = str_replace($search, $replace, $value);
        $value = trim($value);

        $values = explode(' ', $value);
        $tokens = [];
        foreach ($values as $token) {
            $tokens[] = trim($this->wrapString($token));
        }

        return $tokens;
    }

    /**
     * Экранирует спецсимволы sql и оборачивает строку в обратные кавычки
     * @param  string $column Строка
     * @return [type]        Экранированная строка
     */
    private function wrapColumn($column)
    {
        return '`' . $this->db->real_escape_string($column) . '`';
    }

    /**
     * Экранирует спецсимволы sql и оборачивает строку в одинарные кавычки
     * @param  string $value Строка
     * @return [type]        Экранированная строка
     */
    private function wrapString($value)
    {
        return "'" . $this->db->real_escape_string($value) . "'";
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
