<script setup lang="ts">
    import { onBeforeMount, ref } from 'vue';

    const funds = ref([]);
    const fetchFunds = async () => {
        try {
            const response = await fetch('http://localhost/api/duplicated-funds');

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            funds.value = await response.json();

            console.log(funds.value);
        } catch (error) {
            console.error('Error fetching funds:', error);
        }
    };

    onBeforeMount(async () => {
        fetchFunds();
    });
</script>

<template>
    <div class="va-table-responsive">
        <table class="va-table">
            <thead>
                <tr>
                    <th>Manager</th>
                    <th>Funds</th>
                </tr>
            </thead>
            <tbody v-if="funds.length">
                <tr v-for="fund in funds" :key="fund.id">
                    <td>{{ fund.manager.name }}</td>
                    <td class="funds">{{ fund.funds.map(fund => `#${fund.id} ${fund.name}`).join(', ') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped lang="scss">
.funds {
    font-size: 75%;
    color: #666;
    color: #888;
    font-style: italic;
}
</style>
