# **Интерфейс управления 2 сущностями: Авторы и Книги**
<details>
**Задача:**
Необходимо разработать интерфейс управления 2 сущностями: Авторы и Книги.
Интерфейс должен иметь соответственно отдельный раздел на каждую сущность. Раздел должен состоять из страницы со списком элементов сущности и страницы с редактированием конкретного элемента. Все поля сущностей должны выводиться на всех страницах разделов.
Поля сущности Авторы:
-  ФИО - текстовое, обязательное.
-  Количество книг - целое число, автоматически вычисляемое по кол-ву привязанных к автору книг.

Поля сущности Книги:
-  Название - текстовое, обязательное.
-  Цена - натуральное число, обязательное, больше 0.
-  Автор - связанная сущность “Авторы”, многое ко многим, обязательное.
-  Дата публикации - дата, обязательное.

Помимо интерфейса нужно реализовать RESTful API с выдачей результатов в формате JSON:
1. GET /api/v1/books/list - получение списка Книг с ФИО Автора
2. GET /api/v1/books/find - получение данных Книги по id

Также необходимо реализовать консольный скрипт, который во время запуска удалял бы Книги, опубликованные более года назад.

**Требования:**
1. Для реализации задачи рекомендуется использовать любой современный фреймворк, в идеале микрофреймворк.
2. Допускается использование любой базы данных, это может быть хоть MySQL, хоть MongoDB.
3. Для реализации фронтэнд части можно использовать любой готовый HTML шаблон, Bootstrap.
4. Кодировка базы данных, исходников скриптов - UTF-8.
<summary><ins>Задание</ins></summary>
</details>


## Демо

https://books.2ql.ru/

## Установка и запуск

```shell
    git clone git clone https://github.com/eg00/books.git
    cd books
    cp .env.example .env
```

### в локальной среде:

```shell
    composer install
    php artisan key:generate
    php artisan serve
```
**Настроить параметры БД в файле .env** 

```shell
   php artisan migrate:fresh --seed
```

### при использовании docker
```shell
docker-compose up -d
docker exec -it php composer install
docker exec -it php ./artisan key:generate
docker exec -it php ./artisan migrate:fresh --seed
```

### Удаление книг


```shell
php ./artisan books:cleanup"
```
