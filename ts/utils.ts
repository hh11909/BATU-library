type ImageSource = string

type Id = string
type UserId = Id
type AuthorId = Id
type BookId = Id
type RequestId = Id
type CategoryId = Id
type Category = {
  id: CategoryId
  name: string
  genre: string
}

interface BorrowRequestBasic {
  requestId: RequestId
  bookId: BookId
}
interface BorrowRequest extends BorrowRequestBasic {
  userId: UserId
}

interface Guest {
  id: Id
}
interface User extends Guest {
  name: string
  email: string
  borrowRequests: BorrowRequest[]
  borrowedBooks: BookId[]
  wishlistBooks: BookId[]
}
interface Author extends Guest {
  name: string
  books: BookId[]
}


type Book = {
  id: BookId
  authorId: AuthorId
  category: Category
  name: string
  description: string
  images: ImageSource[],
  isBorrowed: boolean
}


type TagName = keyof HTMLElementTagNameMap
type Factory = (tagName: TagName, attrs: { [keyof: string]: any } | null, children: undefined | string | HTMLElement | (HTMLElement | string)[]) => HTMLElement


type BorrowedBook = {
  userId: UserId,
  bookId: BookId,
  borrowedDate: string,
  deadlineDate: string,
}


export {
  Book,
  BorrowRequest,
  BorrowedBook,
  RequestId,
  UserId,
  User,
  Author,
  Category,
  Factory
}
