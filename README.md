# phpwork.uz

**phpwork.uz** — PHP dasturlash tili bo'yicha ish o'rinlarini topish uchun platforma. Bu saytda PHP dasturchilari uchun turli vakansiyalar, ish joylari va freelans imkoniyatlari mavjud. Biz PHP bo'yicha tajribali va yangi boshlovchi dasturchilarni ishga joylashtirishga yordam beramiz.

## Loyihaning maqsadi

phpwork.uz — PHP dasturlash tili bo'yicha ish o'rinlarini topishga yordam beruvchi onlayn platformadir. Sayt foydalanuvchilari PHP dasturchilari uchun vakansiyalarni qidirish va ariza berish imkoniyatiga ega. Loyihaning maqsadi PHP dasturchilarini ish bilan ta'minlash va ish beruvchilarni malakali mutaxassislar bilan bog'lashdir.

## Xususiyatlar

- **Vakansiyalar ro'yxati**: PHP dasturlash tili bo'yicha mavjud ish o'rinlari va freelancerlik imkoniyatlari.
- **Qidiruv tizimi**: PHP vakansiyalarini sanoat, joylashuv va boshqa mezonlarga qarab izlash.
- **Foydalanuvchi ro'yxatdan o'tishi**: Ish izlovchilar va ish beruvchilar uchun ro'yxatdan o'tish imkoniyati.
- **Ariza yuborish**: PHP vakansiyalariga onlayn ariza yuborish.
- **Profil yaratish**: Foydalanuvchilar uchun shaxsiy profil yaratish va ish izlovchilariga o'z malakalarini ko'rsatish imkoniyati.

## O'rnatish

Ushbu loyiha GitHub'da open source sifatida mavjud va siz o'z kompyuteringizda ishlatishingiz yoki o'zgartirishingiz mumkin.


### O'rnatish qadamlar

1. **Loyihani klonlash**:
   GitHub reposini klonlash uchun quyidagi buyruqni bajarishingiz mumkin:

   ```bash
   git clone https://github.com/SukhrobNuraliev/phpwork.git
=======
## Loyiha haqida

Bu loyiha orqali siz PHP ishlatadigan kompaniyalarni bir joyda topishingiz mumkin. Ularning:
Saytlari 🌐
Ish imkoniyatlari (hh.uz havolasi) 💼
LinkedIn profillari va boshqa ma’lumotlari 🛠️
👉 Nega bu loyiha ochiq manbali?
Men vaqt yetishmasligi tufayli loyihani yakunlay olmayapman, shuning uchun uni ochiq manbali qilib, barchani hamkorlikka taklif qilmoqchiman. Bu loyiha birgalikda rivojlanadi va yanada kuchli bo‘ladi! 💪

- GitHub: https://github.com/SukhrobNuraliev/ph...
- Trello: https://trello.com/b/uGROFkgt/php-work
- Website: https://phpwork.uz/ (https://phpwork.sukhrob.uz/)
- Telegram Guruh: https://t.me/phpwork_uz_collab
- Google Sheet: https://docs.google.com/spreadsheets/...


## Loyihani o'rnatish

### Docker orqali ishlash

Bu uchun sizda docker va docker-compose o'rnatilgan bo'lishi lozim, va Docker desctop container lar bilan ishlash uchun

- git clone git@github.com:SukhrobNuraliev/phpwork.git
- cd phpwork
- make init
- cp .env.example .env
- make project-key-generate
- cp database/test-database.sqlite database.sqlite
- make project-migrate

phpstan va Laravel pint ni zapusk qilish uchun

- make fix


### Local development
                  
- git clone git@github.com:SukhrobNuraliev/phpwork.git
- cd phpwork
- composer install
- cp .env.example .env
- php artisan key:generate
- cp database/test-database.sqlite database.sqlite
- php artisan migrate

phpstan va Laravel pint ni zapusk qilish uchun
 - composer cs-fix
 - composer larastan
