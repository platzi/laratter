<div class="card">
	<div class="card-block">
		<img class="img-thumbnail" src="{{ $message->image }}">
	</div>
	<div class="card-block">
		<p class="card-text">
			<div class="text-muted">Escrito por <a href="/{{ $message->user->username }}">{{ $message->user->name }}</a>
			</div>
			{{ $message->content }}
			<a href="/messages/{{ $message->id }}">Leer más</a>
		</p>
	</div>
	<div class="card-footer">
		<div class="row">
			<div class="col-9">
				<form action="/messages/{{ $message->id }}" method="post">
					{{ method_field('put') }}
					{{ csrf_field() }}
					<div class="input-group">
						<input type="text" class="form-control" name="content" placeholder="Responder..." required>
						<span class="input-group-btn">
							<button class="btn btn-outline-primary">Enviar</button>
						</span>
					</div>
				</form>
			</div>
			<div class="col-3 text-muted align-items-center">
				<span class="float-right">{{ $message->created_at }}</span>
			</div>
		</div>
	</div>
</div>