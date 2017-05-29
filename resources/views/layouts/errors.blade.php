    <div class="notification is-danger" style="margin-top: 10px;" v-if="errors.any()">
        <ul>
            <li v-text="errors.get('name')"></li>
            <li v-text="errors.get('description')"></li>
        </ul>
    </div>