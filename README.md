## Here some credential
```

** Admin **
admin@admin.com
secret

**Teacher**
teacher@teacher.com
secret

**User
user@user.com


```


## How to setup project 

```
1. Clone this repository.
2. composer install
3. npm install
4. rename .env.example to .env (and change to your database )
5. composer artisan key:gen
6. php artisan migrate or migrate:fresh
7. php artisan db:seed 
8. php artisan serve && npm run dev


```