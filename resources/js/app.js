import { App, plugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { createApp, defineAsyncComponent, h } from 'vue';
import '../css/app.css';

const el = document.getElementById('app');
const pages = import.meta.globEager('./Pages/**/*.vue');
const layouts = import.meta.globEager('./Layouts/**/*.vue');
InertiaProgress.init({ color: '#4B5563' });

const app = createApp({
    provide: {
        route: route,
    },
    render: () =>
        h(App, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => {
                const page = pages[`./Pages/${name}.vue`].default;
                page.layout = layouts[`./Layouts/${page.layoutName || 'Layout'}.vue`].default;
                return page;
            },
        }),
});

const components = import.meta.glob('./Components/**/*.vue');


Object.entries(components).forEach(([path, component]) => {
    const name = path.match(/^\.\/(.+\/)*(.+)\.vue$/)[2];
    app.component(name, defineAsyncComponent(component));
});

app.use(plugin);
app.mount(el);

