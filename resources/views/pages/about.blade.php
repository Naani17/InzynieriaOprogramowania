@extends('master')
@section('content')
<h2>Projekt zaliczeniowy z przedmiotu Inzynieria Oprogramowania (studia
niestacjonarne)</h2>
<h3>Cel projektu</h3>
<p>Celem projektu zaliczeniowego jest przygotowanie dokumentacji wymagań, a następnie
zaimplementowanie aplikacji na podstawie dokumentacji. Projekt wykonywany jest w grupach 2-
osobowych.</p>
<h3>Temat projektu</h3>
<p>Temat projektu jest dowolny (o ile tylko spełnia wymagania), jednak należy go uzgodnić z
prowadzącymi zajęcia. Tematy nie powinny się powtarzać.</p>



<h4>Przykładowym tematem jest aplikacja typu Quizwanie:</h4>
<p>Użytkownik może się zalogować, a następnie po wybraniu opcji, przejść przez quiz składający się z
kilku pytań pobieranych z bazy. Po przejściu przez quiz wyświetla mu się wynik. Aplikacja
prowadzi także statystyki, umożliwia użytkownikowi zobaczenie swoich średnich wyników i
porównanie ich z top 5. Użytkownik może dodawać własne pytania, lecz żeby te zostały dodane do
puli pytań, z której korzysta aplikacja, muszą być najpierw zatwierdzone przez administratora.</p>

<h3>Dokumentacja składa się z:</h3>
<ul>
	<li>wymagań funkcjonalnych – w postaci przypadków użycia. Ich liczba może się różnić w
	zależności od projektu, lecz powinno być ich przynajmniej 4. Wymagania są sporządzone
	zgodnie ze sposobem przedstawionym na zajęciach, wraz z rozszerzeniami.
	(CRUD'y, logowanie etc. są automatycznie generowane/obsługiwane przez frameworka –
	choć mogą być niezbędne dla działania aplikacji, nie wliczają się do 4 wymagań.)
	</li>
	<li> wymagań pozafunkcjonalnych – powinno być przynajmniej 5 mierzalnych wymagań
	pozafunkcjonalnych</li>
	<li> makiet – przygotowane ekrany aplikacji w dowolnym programie (np. balsamiq, pencil)
	</li>
</ul>


<h3>Wymagania projektu:</h3>
<ul>
	<li>technologia – dowolny język programowania wspierający obiektowość</li>
	<li>zachowana jest konwencja nazewnictwa tego języka. Nazwy klas, zmiennych, metod,
	parametrów etc. są jednoznaczne i pokrywają się z ich przeznaczeniem</li>
	<li>architektura – MVC</li>
	<li>interakcja z użytkownikiem</li>
	<li>zapis/odczyt danych do bazy lub pliku</li>
	<li>wykorzystanie systemu kontroli wersji (np. git, mercurial, SVN). Nazwy commitów
	jednoznacznie opisują wprowadzone zmiany. Oczekuje się rozdzielania funkcjonalności po
	poszczególnych commitach (git commit -m „zrobiłem projekt” nie gwarantuje, że
	prowadzący go przyjmie). Repozytorium dostępne dla prowadzących</li>
	<li>wykorzystanie 2 wzorców projektowych (oprócz MVC)</li>
	<li>estetyka – aplikacja powinna spełniać podstawowe kategorie estetyczne</li>
	<li>terminem oddawania aplikacji są ostatnie zajęcia</li>
</ul>

<h3>Ogólne uwagi</h3>
<ul>
	<li>przygotowanie wymagań i ich ocena poprzedza prace implementacyjne nad aplikacją</li>
	<li>projekt musi być własnego autorstwa</li>
	<li>niedozwolone jest korzystanie z 'wyklikiwalnych gotowców</li>
</ul>


@stop
