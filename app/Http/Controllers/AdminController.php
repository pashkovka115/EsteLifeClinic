<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Appointment;
use App\Models\Call;
use App\Models\Doctor;
use App\Models\OnlineConsultation;
use App\Models\Post;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    #главная админ-панели
    public function index()
    {
        //записей на приём
        $appointments = Appointment::count();
        //записей на онлайн консультацию
        $online = OnlineConsultation::count();
        // Услуг
        $services = Service::count();
        // Врачей
        $doctors = Doctor::count();
        // Отзывы
        $reviews = Review::count();
        // Новости
        $posts = Post::count();
        // Акции и скидки
        $actions = Action::count();
        // Необработанные звонки
        $calls = Call::where('status', '0')->count();

        return view('admin.index', [
            'appointments' => $appointments,
            'online' => $online,
            'services' => $services,
            'doctors' => $doctors,
            'reviews' => $reviews,
            'posts' => $posts,
            'actions' => $actions,
            'calls' => $calls
        ]);
    }
}
