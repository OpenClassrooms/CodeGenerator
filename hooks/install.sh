#!/bin/sh

rm -rf .git/hooks/pre-commit.d
rm -rf .git/hooks/pre-commit

mkdir .git/hooks/pre-commit.d

cp hooks/pre-commit .git/hooks/pre-commit
cp hooks/pre-commit.d/001-php-lint .git/hooks/pre-commit.d/001-php-lint
cp hooks/pre-commit.d/004-newline-at-eof .git/hooks/pre-commit.d/004-newline-at-eof
cp hooks/pre-commit.d/005-phpcs-fixer .git/hooks/pre-commit.d/005-phpcs-fixer

rm -rf .git/hooks/pre-push.d
rm -rf .git/hooks/pre-push

mkdir .git/hooks/pre-push.d

cp hooks/pre-push .git/hooks/pre-push
cp hooks/pre-push.d/001-phpunit .git/hooks/pre-push.d/001-phpunit

chmod +x .git/hooks/pre-commit
chmod +x .git/hooks/pre-push
