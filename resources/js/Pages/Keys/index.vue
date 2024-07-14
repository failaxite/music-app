<template>
    <MusicLayout>
        <template #title>
            API Keys
        </template>
        <template #action>
            <Link :href="route('Keys.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded py-2 px-4">
            Create API Key
            </Link>
        </template>
        <template #content>
            <div class="">
                <div v-for="apikey in apikeys" :key="apikey.uuid">
                    <div class="p-4 border rounded shadow">
                        <h3 class="text-lg font-bold">{{ apikey.name }}</h3>
                        <p>{{ apikey.key }}</p>
                        <Link :href="route('Keys.destroy', { Key: apikey.id })"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold rounded py-2 px-4 mt-2" method="delete"
                            as="button">
                        Supprimer
                        </Link>
                    </div>
                </div>
            </div>
        </template>
    </MusicLayout>
</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';

export default {
    name: 'Index',
    components: {
        MusicLayout,
    },
    props: {
        apikeys: Array
    },
}
</script>
