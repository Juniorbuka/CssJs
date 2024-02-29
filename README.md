CcsJs-for-EVO CMS
=====================
Component CssJs for EVO CMS

Опис
----------
Сніпети засновані на компоненті MinifyX під EVO CMS, вирішать питання роботи з файлами ститів та скриптів.
- Оновлення версії файлу (заснованої на даті останнього оновлення)
- Мініфікація файлів
- З'єднання всіх файлів до 1.


Встановлення
----------
- Встановити через Extras або PackageManager
- Ручна установка: залити на сервер папку Assets, створити 2 сніпети js і css з кодом з файлів (istall/assets/snippets)

Приклад виклику у стандартному шаблонізаторі EVO
----------


	[!css? &files=`assets/templates/tpl/css/bootstrap.css,
				   assets/js/prettify/prettify.css`
		   &minify=`1`!]

	[!js? &files=`assets/js/jquery-1.8.3.min.js,
				  assets/templates/tpl/js/modernizr.custom.28468.js,
				  assets/js/jquery.validate.js,
				  assets/js/jquery.form.min.js,
				  assets/js/prettify/prettify.js`
		  &minify=`1`!]


Приклад виклику у шаблонізаторі Blade
----------
```
{!!evo()->runSnippet('css',[
'files' => '
template/css/mycss/css1.css,
template/css/mycss/css2.css
',
'filename'=> 'new_css',
'filepre' => 'media="print" onload="this.media=\'all\'"',
'minify' => '1',
'link_rel' => 'stylesheet',
'folder' => 'template/css/mycss/'
])!!}
```

Такий виклик виведе наступне:
>link rel="stylesheet" href="/template/css/mycss/new_css.min.css?v=d41" media="print" onload="this.media='all'"


Параметри сніпету
-------
- **files** Список файлів із CSS стилями, які потрібно включити в кінцевий файл та стиснути
- **minify** - стискати та об'єднувати файлик
- **inhtml** - розмістити відразу в HTML, у тегах <style></style>
- **folder** до якої папки зберігати стислий файл. За замовчуванням корінь сайту
- **filename** - нове ім'я стисненого файлу
- **filepre** - можна вказати попереднє завантаження або асинхронність, наприклад media="print" onload="this.media='all'".
- **link_rel** - можна вказати будь-який атрибут для стилів, наприклад preload, а в filepre вказати as="style" onload="this.rel='stylesheet'", за замовчуванням атрибут "stylesheet"


TODO
-------
- Додати обробку LESS
- Додати обробку SASS
- Додати обробку inline css та js
