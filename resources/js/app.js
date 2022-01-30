import React from 'react'
import { render } from 'react-dom'
import { createInertiaApp } from '@inertiajs/inertia-react'
import { InertiaProgress } from '@inertiajs/progress'

require('./bootstrap');

InertiaProgress.init()
createInertiaApp({
  resolve: name => require(`./components/${name}/index.js`),
  setup({ el, App, props }) {
    render(<App {...props} />, el)
  },
})
