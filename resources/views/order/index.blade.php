@extends('layout.app')

@section('content')
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <!-- list section start -->
                <div class="card">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table1 table">
                            <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Proses</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr role="row" class="odd">
                                <td class=" control" tabindex="0" style="display: none;"></td>
                                <td>
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1">
                                                <img src="{{ asset("assets/images/avatars/2-small.png")}}"
                                                     data-toggle="popover" data-placement="top"
                                                     data-container="body" data-original-title="Popover on top"
                                                     data-content="Macaroon chocolate candy."
                                                     alt="Avatar" height="32" width="32">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column"><a href="#" class="user_name text-truncate">
                                                <span class="font-weight-bold">Zsazsa Cleverty</span></a>
                                            <small class="emp_post text-muted">Finance</small></div>
                                    </div>
                                </td>
                                <td class="sorting_1">Content description</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1">
                                                <img src="{{ asset("assets/images/avatars/1-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1 ml-1">
                                                <img src="{{ asset("assets/images/avatars/2-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1 ml-1">
                                                <img src="{{ asset("assets/images/avatars/3-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>test 2</td>
                            </tr>
                            <tr role="row" class="event">
                                <td class=" control" tabindex="0" style="display: none;"></td>
                                <td>
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1">
                                                <img src="{{ asset("assets/images/avatars/1-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column"><a href="#" class="user_name text-truncate">
                                                <span class="font-weight-bold">Zsazsa McCleverty</span></a>
                                            <small class="emp_post text-muted">Owner</small></div>
                                    </div>
                                </td>
                                <td class="sorting_1">Content description</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1">
                                                <img src="{{ asset("assets/images/avatars/6-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1 ml-1">
                                                <img src="{{ asset("assets/images/avatars/5-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1 ml-1">
                                                <img src="{{ asset("assets/images/avatars/4-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-truncate d-flex align-items-center">
                                        <span class="badge bg-label-success">Author</span>
                                    </span>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class=" control" tabindex="0" style="display: none;"></td>
                                <td>
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1">
                                                <img src="{{ asset("assets/images/avatars/3-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column"><a href="#" class="user_name text-truncate">
                                                <span class="font-weight-bold">Zsazsa McCleverty</span></a>
                                            <small class="emp_post text-muted">Deliver</small></div>
                                    </div>
                                </td>
                                <td class="sorting_1">Content description</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1">
                                                <img src="{{ asset("assets/images/avatars/4-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1 ml-1">
                                                <img src="{{ asset("assets/images/avatars/6-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-xl mr-1 ml-1">
                                                <img src="{{ asset("assets/images/avatars/1-small.png")}}" alt="Avatar"
                                                     height="32" width="32">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>Enterprise</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal to add new user starts-->
                    <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                        <div class="modal-dialog">
                            <form class="add-new-user modal-content pt-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                        <input type="text" class="form-control dt-full-name"
                                               id="basic-icon-default-fullname" placeholder="John Doe"
                                               name="user-fullname" aria-label="John Doe"
                                               aria-describedby="basic-icon-default-fullname2"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-icon-default-uname">Username</label>
                                        <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                               placeholder="Web Developer" aria-label="jdoe1"
                                               aria-describedby="basic-icon-default-uname2" name="user-name"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-icon-default-email">Email</label>
                                        <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                               placeholder="john.doe@example.com" aria-label="john.doe@example.com"
                                               aria-describedby="basic-icon-default-email2" name="user-email"/>
                                        <small class="form-text text-muted"> You can use letters, numbers &
                                            periods </small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="user-role">User Role</label>
                                        <select id="user-role" class="form-control">
                                            <option value="subscriber">Subscriber</option>
                                            <option value="editor">Editor</option>
                                            <option value="maintainer">Maintainer</option>
                                            <option value="author">Author</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="user-plan">Select Plan</label>
                                        <select id="user-plan" class="form-control">
                                            <option value="basic">Basic</option>
                                            <option value="enterprise">Enterprise</option>
                                            <option value="company">Company</option>
                                            <option value="team">Team</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Modal to add new user Ends-->
                </div>
                <!-- list section end -->
            </section>
            <!-- users list ends -->
        </div>
    </div>
@endsection
