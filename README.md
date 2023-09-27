alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail artisan db:seed --class=LanguagesSeeder

php artisan make:migration create_apartment_facility_table

https://www.kaggle.com/datasets/ambarishdeb/gym-exercises-dataset?resource=download
