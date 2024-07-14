<template>
    <MusicLayout>
        <template #title>
            Créer une clé API
        </template>
        <template #action>
            <Link :href="route('Keys.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
            Retour
            </Link>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <!-- Nom -->
                <div class="mb-3">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                    <input id="name" v-model="form.name" type="text"
                        class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-2"
                        :class="{ 'border-red-500': form.errors.name }" placeholder="Nom de la clé API">
                    <p class="text-red-500 text-xs italic">{{ form.errors.name }}</p>
                </div>
                <input type="submit" value="Créer la clé API" class="text-white font-bold rounded py-2 px-4 my-5"
                    :class="[form.processing ? 'bg-gray-500' : 'bg-blue-500 hover:bg-blue-700']"
                    :disabled="form.processing">
            </form>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
    name: 'Create',
    components: {
        MusicLayout,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
            }),
        }
    },
    methods: {
        submit() {
            this.form.post(route('Keys.store'));
        }
    }
}
</script>
