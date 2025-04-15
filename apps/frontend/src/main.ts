import  'vuestic-ui/css';
import './styles.scss';
import { createApp } from 'vue';
import App from './app/App.vue';
import { createVuestic } from 'vuestic-ui';

createApp(App)
    .use(createVuestic())
    .mount('#root');
