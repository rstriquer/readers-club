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
                        return <BookCard
                            key={i}
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