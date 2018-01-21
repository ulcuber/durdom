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
     * Возвращает одну новость
     * @param $id
     * @return Array
     */
    public function getNewsSingle($id)
    {
        return $this->getById('news', $id);
    }

    /**
     * Возвращает один обзор
     * @param $id
     * @return Array
     */
    public function getReview($id)
    {
        return $this->getById('reviews', $id);
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
    public function insert(string $table, array $item)
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
    public function update(string $table, array $item)
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
    public function getById(string $table, $id)
    {
        $table = $this->wrapColumn($table);
        $sql = "SELECT * FROM " . $table . " WHERE id = " . (int) $id . " LIMIT 1";
        $result = $this->db->query($sql);
        return $result ? $result->fetch_assoc() : false;
    }

    /**
     * Экранирует спецсимволы sql и оборачивает строку в обратные кавычки
     * @param  string $column Строка
     * @return [type]        Экранированная строка
     */
    private function wrapColumn(string $column)
    {
        return '`' . $this->db->real_escape_string($column) . '`';
    }

    /**
     * Экранирует спецсимволы sql и оборачивает строку в одинарные кавычки
     * @param  string $value Строка
     * @return [type]        Экранированная строка
     */
    private function wrapString(string $value)
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
