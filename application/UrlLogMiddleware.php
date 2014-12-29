<?php

namespace Application;

class UrlLogMiddleware extends \Slim\Middleware {
	public function call() {
		$app = $this->app;
		$app->log->debug($app->request->getUrl());

		$this->next->call();
	}
}
