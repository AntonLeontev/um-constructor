Нужно добавить в настройки nginx чтение конфигов из директории nginx.

Нужно дать разрешение пользователю www-data запускать команду sudo nginx без пароля:
В файл /etc/sudoers или в /etc/sudoers.d добавить строку www-data ALL = (root) NOPASSWD: /usr/sbin/nginx
