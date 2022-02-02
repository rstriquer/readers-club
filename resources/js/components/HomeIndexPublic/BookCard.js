import React, { Component } from 'react'
import NoImage from "../../../img/noimage.png"

class BookCard extends React.Component {
    constructor(props) {
        super(props)
    }

    AddToMyCollection(props) {
        let $href = "/user-area/" + (props.book?.isbn_13 ? props.book?.isbn_13 : props.book?.isbn_10)
        return (<a href={$href} className="btn btn-primary ms-2 end">Adicionar Livro</a>)
    }
    render() {
        return(
            <div className="col-sm-12 col-md-6 col-lg-4 p-10">
                <div className="row card-body">
                    <div className="col-md-4">
                        <img src={this.props.image?this.props.image:NoImage} />
                    </div>
                    <div className="col-md-8">
                        <div>
                            <h5 className="fw-bold">{this.props.title}</h5>
                            <p className="fw-light">Autor: {this.props.author}</p>
                            <p className="fw-light">Editora: {this.props.publisher}</p>
                            <p className="fw-light">Edição: {this.props.published}</p>
                            <a target="_blank" href={this.props.previewLink} className="btn btn-light">Preview</a>
                            <this.AddToMyCollection book={this.props} />
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default BookCard