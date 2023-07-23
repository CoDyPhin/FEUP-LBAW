@if ($errors->has('email'))
<script>
    $(document).ready(function () {
        $('#recoveryModal').modal('show');
    });
</script>
@endif

<div class="modal fade" id="recoveryModal" tabindex="-1" aria-labelledby="recoveryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container-fluid">
                    <div class="row">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row text-center">
                        <h5><span class="material-icons" style="color: rgb(220, 53, 69); font-size: 70px;">
                        https
                        </span></h5>
                    </div>
                    <div class="row text-center">
                        <h5 class="modal-title" style="font-size: x-large" id="recoveryModalLabel">Forgot your Password?</h5>
                    </div>
                </div>
            </div>
            <form class="modal-footer d-flex justify-content-center" method="POST" action="/forgot">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4"><h6 style="font-size: medium">Please enter the email associated with your account and we'll send you a link with steps to recover your password.</h6></div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email">Email</label>
                        @if ($errors->has('email'))
                          <span class="error">
                              {{$errors->first('email')}}
                          </span>
                        @endif
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row mb-2">
                        <button type="submit" class="btn btn-lg btn-primary">Send Recovery Email</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>