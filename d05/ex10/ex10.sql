SELECT title AS Title, summary AS Summary, prod_year AS prod_year FROM film INNER JOIN genre ON film.id_genre=genre.id_genre WHERE genre.name LIKE 'erotic' ORDER BY prod_year DESC;
