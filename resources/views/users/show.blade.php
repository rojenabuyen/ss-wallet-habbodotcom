
@foreach ($transactions as $transaction)
<ul>
    <li>
        <div>Username: {{ $user->username }}</div>
        <div>Pay Slot:{{ $transaction->created_at->diffForHumans() }}</div>
        <div>Amount: {{ $transaction->amount }}c</div>
    </li>
</ul>



@endforeach
</div>

