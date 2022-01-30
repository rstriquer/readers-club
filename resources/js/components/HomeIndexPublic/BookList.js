import React, { Component } from 'react'
import BookCard from './BookCard'

class BookList extends React.Component {
    constructor(props) {
        super(props)
    }
    render() {
        return (
            <div className="book-list">
                <div className="row mt-4">
                {
                    this.props.books.map((book, i) => {
                        let isbn_10 = '', isbn_13 = ''
                        book.volumeInfo?.industryIdentifiers.map((value) => {
                            switch (value.type) {
                                case "ISBN_10":
                                    isbn_10 = value.identifier
                                    break;
                                case "ISBN_13":
                                    isbn_13 = value.identifier
                                    break;
                            }
                        })
                        return <BookCard
                            key={i}
                            id_api={book.id}
                            isbn_10={isbn_10}
                            isbn_13={isbn_13}
                            image={book.volumeInfo.imageLinks?.smallThumbnail}
                            title={book.volumeInfo.title}
                            previewLink={book.volumeInfo.previewLink}
                            publisher={book.volumeInfo.publisher}
                            author={book.volumeInfo.authors}
                            published={book.volumeInfo.publishedDate}
                        />
                    })
                }
                </div>
            </div>
        )
    }
}

export default BookList