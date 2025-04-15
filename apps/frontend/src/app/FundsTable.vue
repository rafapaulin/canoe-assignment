<script setup lang="ts">
    import { onBeforeMount, ref } from 'vue';

    const funds = ref([]);
    const fetchFunds = async () => {
        try {
            const response = await fetch('http://localhost/api/funds');

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            funds.value = await response.json();
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
                    <th>ID</th>
                    <th>Fund</th>
                    <th>Start Year</th>
                    <th>Manager</th>
                    <th>Companies</th>
                    <th>Aliases</th>
                </tr>
            </thead>
            <tbody v-if="funds.length">
                <tr v-for="fund in funds" :key="fund.id">
                    <td>{{ fund.id }}</td>
                    <td>{{ fund.name }}</td>
                    <td>{{ fund.start_year }}</td>
                    <td>{{ fund.manager.name }}</td>
                    <td class="companies">{{ fund.companies.map(company => company.name).join(', ') }}</td>
                    <td class="aliases">{{ fund.aliases.map(alias => alias.name).join(', ') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped lang="scss">
.aliases,
.companies {
    font-size: 75%;
    color: #666;
}

.aliases {
    color: #888;
    font-style: italic;
}
</style>
