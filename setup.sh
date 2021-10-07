#!/bin/bash
# Theme setup

# Defaults
default_name="Avidly Theme"
default_id="avidly-theme"
default_prefix="avidly_theme"
default_package="Avidly_Theme"
default_url="avidlytheme.test"
default_url_prod="avidlyagency.com"

# Directories
basedir="$( cd "$( dirname "$0" )" && pwd )"
languagedir="$basedir/languages"
basedir_all_files="$basedir/."
setup_script="$basedir/setup.sh"

# Text styles
bold=$(tput bold)
coral=$(tput setaf 210)
blue=$(tput setaf 12)
green=$(tput setaf 2)
txtreset=$(tput sgr0)

echo "1) Set name for your theme. (Default: $default_name)"
read name
# use default if empty
if test -n "$name"; then
  echo ""
else
  id=$default_name
fi

echo "2) Set unique id for your theme. Use only a-z and -. (Default: $default_id)"
read id

# use default if empty
if test -n "$id"; then
  echo ""
else
  id=$default_id
fi

echo "3) Set unique prefix for your theme. Use only a-z and _. (Default: $default_prefix)"
read prefix

# use default if empty
if test -n "$prefix"; then
  echo ""
else
  prefix=$default_prefix
fi

echo "4) Set unique package for your theme. IOt should be the theme name, spaced with underscores. (Default: $default_package)"
read package

# use default if empty
if test -n "$package"; then
  echo ""
else
  prefix=$default_package
fi

echo "5) Set local development url. (Default: $default_url)"
read url

# use default if empty
if test -n "$url"; then
  echo ""
else
  url=$default_url
fi

echo "6) Set production url. (Default: $default_url_prod)"
read url_prod

# use default if empty
if test -n "$url_prod"; then
  echo ""
else
  url=$default_url_prod
fi

while true; do
read -p "7) Is following information correct?

name: ${bold}${coral}$name${txtreset} (Default: $default_name)
id: ${bold}${coral}$id${txtreset} (Default: $default_id)
prefix: ${bold}${coral}$prefix${txtreset} (Default: $default_prefix)
package: ${bold}${coral}$package${txtreset} (Default: $default_package)
url: ${bold}${coral}$url${txtreset} (Default: $default_url)
url_prod: ${bold}${coral}$url_prod${txtreset} (Default: $default_url_prod)

Proceed to install? [y/N]
" yn
  case $yn in
    [Yy]* ) break;;
    [Nn]* ) exit;;
    * ) echo "Please answer y or n.";;
  esac
done

echo "
Almost done! Running the setup:
=========="

# style.css
find "$basedir" -name 'style.css' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;

# # PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;

# Language files
find "$languagedir" -name '*.pot' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;
find "$languagedir" -name '*.po' -type f -exec perl -p -i -e "s|$default_name|$name|g" {} \;

echo "--> Search & replace name ... ${blue}done${txtreset}"

# PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_id|$id|g" {} \;

# style.css
find "$basedir" -name 'style.css' -type f -exec perl -p -i -e "s|$default_id|$id|g" {} \;

# JSON files
find "$basedir_all_files" -name '*.json' -type f -exec perl -p -i -e "s|$default_id|$id|g" {} \;

# Language files
find "$languagedir" -type f -name "${default_id}.pot" -exec mv -f {} "${languagedir}/${id}.pot" \;

echo "--> Search & replace id from..... ${blue}done${txtreset}"

# PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_prefix|$prefix|g" {} \;

# JS files
find "$basedir_all_files" -name '*.js' -type f -exec perl -p -i -e "s|$default_prefix|$prefix|g" {} \;

echo "--> Search & replace prefix ..... ${blue}done${txtreset}"

# JS files
find "$basedir_all_files" -name '*.js' -type f -exec perl -p -i -e "s|$default_package|$package|g" {} \;

# PHP files
find "$basedir_all_files" -name '*.php' -type f -exec perl -p -i -e "s|$default_package|$package|g" {} \;

echo "--> Search & replace package ..... ${blue}done${txtreset}"

#webpack.mix.js
find "$basedir" -name 'webpack.mix.js' -type f -exec perl -p -i -e "s|$default_url|$url|g" {} \;

# style.css
find "$basedir" -name 'style.css' -type f -exec perl -p -i -e "s|$default_url_prod|$url_prod|g" {} \;

echo "--> Change urls .............. ${blue}done${txtreset}"

echo "--> ${green}Setup complete. Have a great day!${txtreset}"

echo "--> setup.sh removed"
rm "$setup_script"