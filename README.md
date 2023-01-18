
## Branches of this repository

- (main) -> Contains the lastest stable version of the requirement.
- (dev) -> Contains all the tests and new features that are currently being implemented, the test and developemnt area.

## EndPoints
All said endpoints were asigned in the API route directory, as such they all are part of said group

1. (get) /api/books/ -> Brings the list of all the books 
2. (post) /api/books/ -> Adds the new book to the list
3. (delete) /api/books/{title} -> Deletes the book by the title that was sent

Note: the same pattern applies to the rest of the controllers (Authors and Publishers) except the delete that works with the ID instead of a title, as can be found on the Collection (json) attached to the project

## Database Structure

the "books" table consists of the fields:

- id (autoincrement and primary)
- title (marked as unique)
- author (contains the id of the author it corresponds to)
- publisher (contains the id of the publisher it corresponds to)
- number_of_pages (int)

## Future ideas in development

- Add the CRUD endpoints for authors and publishers so the API can utilize those later on for filtering and searching processes. (Done)
- Add categories and allow to add multiple categories to a book (Done, missing Categories CRUD)
- Link a user to a favourited book, so it can also be employed and filtered for multiple simultaneous users. (Pending)
- Protect some endpoints with a auth key so they can only be accessed with an user's key (Probably using bearer token as it's the one i've used before).  (Pending)
