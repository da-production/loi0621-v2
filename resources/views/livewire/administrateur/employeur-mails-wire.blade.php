<div class="row mt-2">
    <div class="col-md-12">
        <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
                <tr>
                    <th>
                        Objet
                    </th>
                    <th>
                        Etat
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mails as $mail)
                    <tr>
                        <td>{{ $mail->title }}</td>
                        <td>{{ App\Enum\StatusEnum::from($mail->status)->label() }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><small><strong>Date: </strong>{{ $mail->created_at->format('Y-m-d H:m') }}</small></p>
                            <small><strong>Message: </strong>{{ $mail->payload }}</small>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="controls-below-table">
            <div class="table-records-info">
              {{-- Showing records 1 - 5 --}}
            </div>
            {{ $mails->links() }}
          </div>
    </div>
</div>