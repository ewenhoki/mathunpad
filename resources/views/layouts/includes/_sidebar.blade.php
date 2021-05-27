<aside class="left-sidebar">
  <ul id="slide-out" class="sidenav">
      
      <li>
          <ul class="collapsible">
                <li class="small-cap"><span class="hide-menu">Menu</span></li>
                @if(auth()->user()->role == 'Super Admin')
                <li>
                    <a href="/super_admin/dashboard/data_overview" class="collapsible-header"><i class="material-icons">data_usage</i><span class="hide-menu"> Data Overview </span></a>
                </li>
                <li>
                    <a href="/super_admin/dashboard/students" class="collapsible-header"><i class="material-icons">assignment_ind</i><span class="hide-menu"> Students </span></a>
                </li>
                <li>
                    <a href="/super_admin/dashboard/lecturers" class="collapsible-header"><i class="material-icons">account_circle</i><span class="hide-menu"> Lecturers </span></a>
                </li>
                <li>
                    <a href="/super_admin/dashboard/profile" class="collapsible-header"><i class="material-icons">person_pin</i><span class="hide-menu"> Profile </span></a>
                </li>
                @endif
                @if(auth()->user()->role == 'Admin')
                <li>
                    <a href="/admin/dashboard/admin_profile" class="collapsible-header"><i class="material-icons">person_pin</i><span class="hide-menu"> Profile </span></a>
                </li>
                @endif
                @if(auth()->user()->role == 'Lecturer')
                <li>
                    <a href="/lecturer/dashboard/lecturer_profile" class="collapsible-header"><i class="material-icons">person_pin</i><span class="hide-menu"> Profile </span></a>
                </li>
                @endif
                @if(auth()->user()->role == 'Student')
                <li>
                    <a href="/student/dashboard/student_profile" class="collapsible-header"><i class="material-icons">person_pin</i><span class="hide-menu"> Profile </span></a>
                </li>
                <li>
                    <a href="/student/dashboard/proposal_submission" class="collapsible-header"><i class="material-icons">assignment_returned</i><span class="hide-menu"> Upload Dokumen </span></a>
                </li>
                @endif
                <li>
                    <a href="/logout" class="collapsible-header"><i class="material-icons">directions</i><span class="hide-menu"> Log Out </span></a>
                </li>
                <li>
                    <a href="#" class="collapsible-header"><i class="material-icons">people_outline</i><span class="hide-menu"> FAQs </span></a>
                </li>
          </ul>
      </li>
  </ul>
</aside>