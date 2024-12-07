<div class="msg-info {{$type}}">
    <style>
        .msg-info {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 1.2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .msg-icon {
            margin-right: 15px;
            font-size: 1.5rem;
        }

        .msg-message {
            flex-grow: 1;
        }

        .msg-info.primary {
            background-color: #e7f4ff;
            border: 1px solid #b6d6ff;
            color: #0056b3;
        }

        .msg-info.primary .msg-icon {
            color: #007bff;
        }

        .msg-info.primary .msg-message {
            color: #0056b3;
        }

        .msg-info.warning {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
        }

        .msg-info.warning .msg-icon {
            color: #e0a800;
        }

        .msg-info.warning .msg-message {
            color: #856404;
        }

        .msg-info.error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .msg-info.error .msg-icon {
            color: #dc3545;
        }

        .msg-info.error .msg-message {
            color: #721c24;
        }
    </style>

    <div class="msg-icon">
        @if($type == 'primary')
            ✅
        @elseif($type == 'warning')
            ⚠️
        @else
            ❗️
        @endif
    </div>
    <div class="msg-message {{$type}}">
        {{$message}}
    </div>
</div>
