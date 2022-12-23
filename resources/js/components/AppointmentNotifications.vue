<template>
    <li class="nav-item dropdown">
        <a
            class="nav-link"
            data-toggle="dropdown"
            href="#"
            aria-expanded="false"
        >
            <i class="far fa-bell"></i>

            <span
                v-if="unread.length"
                class="badge badge-warning navbar-badge"
                >{{ unread.length }}</span
            >
        </a>
        <div
            class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
            style="left: inherit; right: 0px"
        >
            <span class="dropdown-item dropdown-header"
                >Notificaciones no leidas</span
            >
            <div v-for="notification in unread">
                <div class="dropdown-divider"></div>
                <a href="/admin/notifications" class="dropdown-item">
                    <i class="fas fa-calendar mr-2"></i>
                    {{ notification.data.title }}
                    <div class="text-right text-muted text-sm">
                        <timeago :datetime="notification.created_at" />
                    </div>
                </a>
            </div>

            <div v-if="unread.length">
                <div class="dropdown-divider"></div>
                <div class="text-center text-muted text-sm">
                    Sin notificaciones no leidas
                </div>
            </div>

            <div class="dropdown-divider"></div>
            <span class="dropdown-item dropdown-header"
                >Notificaciones leidas</span
            >

            <div v-for="notification in read">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i>
                    {{ notification.data.title }}
                    <div
                        class="text-right text-muted text-sm"
                        v-if="notification.read_at"
                    >
                        <timeago :datetime="notification.read_at" />
                    </div>
                </a>
            </div>

            <div class="dropdown-divider"></div>
            <div class="text-center text-muted text-sm">
                Sin notificaciones leidas
            </div>

            <div class="dropdown-divider"></div>
            <a
                href="/admin/notifications/mark-as-read"
                class="dropdown-item dropdown-footer"
                >Marcar como leidas</a
            >
        </div>
    </li>
</template>

<script>
export default {
    props: ["user_id", "read_notifications", "unread_notifications"],
    data() {
        return {
            unread: [],
            read: [],
        };
    },
    methods: {
        setJson(payload) {
            this.notifications = payload;
        },
    },
    mounted() {
        this.unread = JSON.parse(this.unread_notifications);
        this.read = JSON.parse(this.read_notifications);

        window.Echo.private(`App.Models.User.${this.user_id}`).notification(
            (notification) => {
                this.unread.unshift({
                    data: {
                        ...notification,
                    },
                    created_at: notification.time,
                });
            }
        );
    },
};
</script>
