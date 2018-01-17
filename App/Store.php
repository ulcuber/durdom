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
        $this->db = Db::getInstance();
    }

    public static function getInstance()
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
     * @return Array
     */
    public function getNewsSingle($id)
    {
        $sql = "SELECT * FROM news WHERE id = " . (int) $id . " LIMIT 1";
        $result = $this->db->query($sql);
        return $result ? $result->fetch_assoc() : false;
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

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
