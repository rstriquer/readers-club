import React from 'react'
import { render } from 'react-dom'
import { InertiaApp } from '@inertiajs/inertia-react'
import Books from './Books'

/**
 * Builds form and list result to book search
 */
export default function HomeIndexPublic() {
    return (
        <div className="App">
            <Books />
        </div>
    );
}