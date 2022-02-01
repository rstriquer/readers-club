import React, { useState } from 'react'
import ReactDOM from 'react-dom'
import { FaStar } from 'react-icons/fa'

const e = React.createElement;

// credit to https://www.youtube.com/watch?v=eDw46GYAIDQ
const Ratings = () => {
    const originalValue = document.querySelector('#ratings-value').value
    const [rating, setRating] = useState(originalValue)
    const [hover, setHover] = useState(originalValue)
    return (
        <div>
            {[...Array(5)].map((star, i) => {
                const ratingValue = i + 1
                return (
                    <label onClick={() => setRating(ratingValue)} onMouseEnter={() => setHover(ratingValue)} onMouseLeave={() => setHover(null)}>
                        <input type="radio" name="rating" value={ratingValue} className="d-none" defaultChecked = {ratingValue == originalValue}  />
                        <FaStar className={ratingValue <= (hover || rating) ? "star star-selected" : "star star-unselected"} size={50} />
                    </label>
                )
            })}
        </div>
    )
}

var domContainer = document.querySelector('#ratings')
if (domContainer) {
    ReactDOM.render(e(Ratings), domContainer);
}
