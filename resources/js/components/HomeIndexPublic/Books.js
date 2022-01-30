import React, { Component } from 'react'
import SearchArea from './SearchArea'
import BookList from './BookList'
import request from 'superagent'

class Books extends Component {
    constructor(props) {
        super(props);
        this.state = {
            books: [],
            searchField: ''
        }
    }
    bookSearch = () => {
        request
            .get('https://www.googleapis.com/books/v1/volumes')
            .query({ q: this.state.searchField })
            .then((data) => {
                this.setState({ books: [...data.body.items]})
            })
    }
    setSearchField = (queryString) => {
        this.setState({ searchField: queryString })
    }
    render() {
        return (
            <div>
                <SearchArea setQuery={this.setSearchField} search={this.bookSearch} />
                <BookList books={this.state.books} />
            </div>
        )
    }
}

export default Books