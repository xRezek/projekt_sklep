# Projekt Sklep

To jest aplikacja internetowa dla sklepu online. Projekt zawiera różne funkcje, takie jak uwierzytelnianie użytkowników, lista produktów, koszyk i zarządzanie zamówieniami.

## Spis treści

- [Instalacja](#instalacja)
- [Użytkowanie](#użytkowanie)
- [Struktura plików](#struktura-plików)
- [Funkcje](#funkcje)
- [Użyte technologie](#użyte-technologie)
- [Licencja](#licencja)

## Instalacja

1. Sklonuj repozytorium:
    ```sh
    git clone https://github.com/yourusername/projekt_sklep.git
    ```
2. Przejdź do katalogu projektu:
    ```sh
    cd projekt_sklep
    ```
3. Skonfiguruj bazę danych:
    - Utwórz bazę danych i zaimportuj plik `dbconfig.php`.
    - Zaktualizuj konfigurację bazy danych w `dbconfig.php`.

4. Uruchom serwer:
    - Użyj lokalnego serwera, takiego jak XAMPP lub WAMP, aby hostować projekt.

## Użytkowanie

1. Otwórz projekt w przeglądarce internetowej:
    ```sh
    http://localhost/projekt_sklep
    ```
2. Zarejestruj nowego użytkownika lub zaloguj się na istniejące konto.
3. Przeglądaj produkty, dodawaj je do koszyka i przejdź do realizacji zamówienia.

## Struktura plików

```
projekt_sklep/
├── css/
│   ├── bootstrap.min.css
│   ├── clearstyle.css
│   ├── fontawesome.css
│   ├── style.css
├── images/
│   ├── logo.jpg
│   ├── clothes-rack.png
│   └── ... (inne obrazy produktów)
├── scripts/
│   ├── bootstrap.bundle.min.js
│   ├── bootstrap.esm.js
│   ├── bootstrap.js
│   ├── app.js
│   ├── jquery-3.7.1.min.js
├── index.php
├── dbconfig.php
├── debug.php
├── listOfProducts.php
├── product.php
├── summary.php
├── login.php
├── register.php
├── logout.php
├── deleteCartItem.php
├── admin_login.php
└── README.md
```

## Funkcje

- **Uwierzytelnianie użytkowników**: Rejestracja, logowanie i wylogowanie.
- **Lista produktów**: Wyświetlanie produktów z obrazami, opisami i cenami.
- **Koszyk**: Dodawanie produktów do koszyka, przeglądanie zawartości koszyka i usuwanie produktów.
- **Zarządzanie zamówieniami**: Przejście do realizacji zamówienia i przegląd podsumowania zamówienia.

## Użyte technologie

- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Baza danych**: MySQL