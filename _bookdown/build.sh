export CSS_BOOTSWATCH=flatly
export CSS_PRISM=prism
export MENU_LOGO=/sapien.png
./vendor/bin/bookdown ./book/_bookdown.json
php front.php
