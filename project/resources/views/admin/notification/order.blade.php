		<a class="clear">{{ __('New Order(s).') }}
			@if(count($datas) > 0 || count($statuses) > 0)
			<span id="order-notf-clear" class="clear-notf" data-href="{{ route('order-notf-clear') }}">
				{{ __('Clear All') }}
			</span>
			@endif
		</a>

		@if(count($datas) > 0)

		<ul>
			@foreach($datas as $data)
			<li>
				<a href="{{ route('admin-order-show',$data->order_id) }}">
					<i class="fas fa-2x fa-newspaper"></i> {{ __('You Have a new order.') }}
					<small class="d-block notf-time ">{{ $data->created_at->diffForHumans() }}</small>
				</a>
			</li>
			@endforeach

		</ul>

		@else
		@if(count($statuses) == 0)
		<a class="clear" href="javascript:;">
			{{ __('No New Notifications.') }}
		</a>
		@endif
		@endif


		@if(count($statuses) > 0)
		<ul>
			@foreach($statuses as $status)
			<li>
				<a href="{{ route('admin-order-show',$status->status_id) }}">
					<i class="fas fa-2x fa-newspaper"></i> {{ __('Order status changed to ' . ucwords($status->status)) }}
					<small class="d-block notf-time ">{{ $status->created_at->diffForHumans() }}</small>
				</a>
			</li>
			@endforeach

		</ul>
		@endif