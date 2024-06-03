<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('user_dashboard', app()->getLocale()) }}">
                        <i class="bi bi-grid"></i>
                        <span class="links_name">{{  __('userDashboard.dashboard')  }}</span>
                    </a>
                    <span class="tooltip">{{  __('userDashboard.dashboard')  }}</span>
                </li>
                <li>
                    <a href="{{ route('user_antraege', app()->getLocale()) }}">
                        <i class="bi bi-envelope-open"></i>
                        <span class="links_name">{{  __('userDashboard.applications')  }}</span>
                    </a>
                    <span class="tooltip">{{  __('userDashboard.applicationsToolTip')  }}</span>
                </li>
                <li>
                    <a href="{{ route('user_gesuch', app()->getLocale()) }}">
                        <i class="bi bi-envelope-check"></i>
                        <span class="links_name">{{  __('userDashboard.requests')  }}</span>
                    </a>
                    <span class="tooltip">{{  __('userDashboard.requestsToolTip')  }}</span>
                </li>
                <li>
                    <a href="{{ route('user_nachrichten', app()->getLocale()) }}">
                        <i class="bi bi-chat-dots"></i>
                        <span class="links_name">{{  __('userDashboard.messages')  }}</span>
                    </a>
                    <span class="tooltip">{{  __('userDashboard.messagesToolTip')  }}</span>
                </li>
                <li>
                    <a href="{{ route('user_dateien', app()->getLocale()) }}">
                        <i class="bi bi-folder-plus"></i>
                        <span class="links_name">{{  __('userDashboard.files')  }}</span>
                    </a>
                    <span class="tooltip">{{  __('userDashboard.filesToolTip')  }}</span>
                </li>
                <li>
                    <a href="{{ route('user_profile.edit', app()->getLocale()) }}">
                        <i class="bi bi-person"></i>
                        <span class="links_name">{{  __('userDashboard.profile')  }}</span>
                    </a>
                    <span class="tooltip">{{  __('userDashboard.profileToolTip')  }}</span>
                </li>

                <li>
                    <a href="{{ route('user_delete', app()->getLocale()) }}">
                        <i class="bi bi-person-x"></i>
                        <span class="links_name">{{  __('userDashboard.delAccount')  }}</span>
                    </a>
                    <span class="tooltip">{{  __('userDashboard.delAccountToolTip')  }}</span>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
