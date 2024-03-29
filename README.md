
## Branches of this repository

- (main) -> Contains the lastest stable version of the requirement.
- (dev) -> Contains all the tests and new features that are currently being implemented, the test and developemnt area.

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

## Future ideas in development

- Add the CRUD endpoints for authors and publishers so the API can utilize those later on for filtering and searching processes.
- Link a user to a favourited book, so it can also be employed and filtered for multiple simultaneous users.
- Protect some endpoints with a auth key so they can only be accessed with an user's key (Probably using bearer token as it's the one i've used before). 
