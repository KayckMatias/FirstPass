<?php

namespace App\Traits\Auth;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait CustomVerifiesEmailsTrait
{

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                        ? new JsonResponse([], 204)
                        : redirect(route('home'))->with([
                            'message'=> 'Your email has verified! Enjoy our system :D',
                            'alert_type' => 'custom-alert-success'
                        ]);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if ($response = $this->verified($request)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect(route('home'))->with([
                        'message'=> 'Your email has verified! Enjoy our system :D',
                        'alert_type' => 'custom-alert-success'
                    ]);
    }

    /**
     * The user has been verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function verified(Request $request)
    {
        //
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $request->wantsJson()
                        ? new JsonResponse([], 204)
                        : redirect(route('home'))->with([
                            'message'=> 'Your email has verified! Enjoy our system :D',
                            'alert_type' => 'custom-alert-success'
                        ]);
        }

        $request->user()->sendEmailVerificationNotification();

        return $request->wantsJson()
                    ? new JsonResponse([], 202)
                    : redirect(route('home'))->with([
                        'resended' => 'true',
                        'message'=> 'Verification link sent! Remember to check the spam box.',
                        'alert_type' => 'custom-alert-success'
                    ]);
    }
}
