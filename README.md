# Name

Kowo

## Installation

method 1 (need use All-in-One WP Migration wordpress plugin)
1. Create new mysql database (please use utf8_general_ci) on your website.
2. Downolad the latest wordpress version form https://uk.wordpress.org/download/ and install it on your site. Use created database in connection options 
3. Remove directories wp-conent/plugins and wp-conent/themes from installed wordpress version
4. Copy directories wp-conent/plugins and wp-conent/themes from this repository into your site
5. Copy kowo.cababot.com-20201029-114115-tutz0q.wpress from this repository into your site or local machine
6. Activate All-in-One WP Migration plugin in admin-panel 
7. In wordpress adminpanel use All-in-One WP Migration->Import and file kowo.cababot.com-20201029-114115-tutz0q.wpress 
8. If there is a need to add images to pages and posts copy directory wp-conent/uploads/2020 from this repository into your site

method 2 (without using All-in-One WP Migration wordpress plugin)
1. Create new mysql database (please use utf8_general_ci) on your website.
2. Use easyd1_kowo.sql from this repository to import all database tables into your website database.
3. In your website database in table wp_options replace option_value in rows where option_id===1 and option_id===2 to your website domen name. 
4. Downolad the latest wordpress version form https://uk.wordpress.org/download/ and install it on your site. Use created database in connection options
5. Remove directories wp-conent/plugins and wp-conent/themes from installed wordpress version
6. Copy directories wp-conent/plugins and wp-conent/themes from this repository into your site
7. If there is a need to add images to pages and posts copy directory wp-conent/uploads/2020 from this repository into your site

## Support

Email - dmitrishinbv@gmail.com
Telegram - https://t.me/bdmytryshyn
Chatroom - https://whereby.com/kowo_prod

## License
[MIT](https://choosealicense.com/licenses/mit/)