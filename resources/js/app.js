

import { createApp } from 'vue';
import RecipientForm from './components/RecipientForm.vue';

const app = createApp({});


app.component('recipient-form', RecipientForm);


app.mount('#app');