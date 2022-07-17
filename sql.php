<?php

/* 6
 * В базе данных имеется
 * таблица с товарами goods (id INTEGER, name TEXT),
 * таблица с тегами tags (id INTEGER, name TEXT) и
 * таблица связи товаров и тегов goods_tags (tag_id INTEGER, goods_id INTEGER, UNIQUE(tag_id, goods_id)).
 *
 * Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.
 */
$sql = "SELECT goods.id, goods.name FROM goods_tags,goods WHERE goods_tags.goods_id =goods.id ";

/*
 * 5 Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины, и все они (каждый) поставили высокую оценку (строго выше 5).
 *
 * create table evaluations
(
    respondent_id uuid primary key, -- ID респондента
    department_id uuid,             -- ID департамента
    gender        boolean,          -- true — мужчина, false — женщина
    value         integer	    -- Оценка
);

 */
$sql = "SELECT department_id FROM evaluations WHERE value > 5 AND gender = true  GROUP BY (department_id)";