import React, { Component } from 'react'

class SearchArea extends React.Component {
    constructor(props) {
        super(props)
        this.handleClick = this.handleClick.bind(this)
        this.handleInput = this.handleInput.bind(this)
    }
    handleInput(evt) {
        this.props.setQuery(evt.target.value)
    }
    handleClick() {
        this.props.search()
    }
    render(props) {
        return (
            <div className="container">
                <h1 id="title" className="text-center mt-5">Encontre seu Livro</h1>
                <div className="row">
                    <div id="input" className="input-group mx-auto col-lg-6 col-md-8 col-sm-12">
                        <input id="search-box" type="text" className="form-control" placeholder="Diga-me qual o seu livro" onChange={this.handleInput} />
                        <button id="search" className="btn btn-primary" onClick={this.handleClick}>Buscar</button>
                    </div>
                </div>
            </div>
        )
    }
}

export default SearchArea