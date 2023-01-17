## EndPoints
All said endpoints were asigned in the API route directory, as such they all are part of said group

1. (get) /api/books/ -> Brings the list of all the books 
2. (post) /api/books/ -> Adds the new book to the list
3. (delete) /api/books/{title} -> Deletes the book by the title that was sent


## Database Structure

the "books" table consists of the fields:

- id (autoincrement and primary)
- title (marked as unique)
- author (string in it's current version, but preferably will be turned into it's own endpoint to manage different authors)
- publisher (string, same as above)
- number_of_pages (int)
