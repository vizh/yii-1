<?php
namespace api\components;

class Exception extends \CException
{
    const PAY_EXCEPTION_PREFIX = 40000;

    private $data;

    /**
     * @param int|\CModel $code
     * @param array $params
     * @param \Exception $previous
     */
    public function __construct($code, $params = [], \Exception $previous = null)
    {
        // Передана модель с ошибками валидации
        if ($code instanceof \CModel) {
            /** @var \CModel $code */
            $msg = 'Ошибки валидации при сохранении модели';
            $this->data = $code->getErrors();
            // Будем создавать ошибку с самым типовым кодом
            $code = 100;
        } else {
            $msg = $this->getErrorMessage($code, $params);
        }

        parent::__construct($msg, $code, $previous);
    }

    private $codes = [
        /** Yii Exception */
        100 => /*'Обработана ошибка Yii: */
            '%s',

        /* Общие ошибки  */
        101 => 'Не найден уникальный API ключ, обратитесь в службу поддержки RUNET-ID',
        102 => 'Неверный хэш запроса, обратитесь в службу поддержки RUNET-ID',
        103 => 'Доступ c ApiKey %s с ip-адреса %s не разрешен, обратитесь в службу поддержки RUNET-ID',
        104 => 'Доступ к данному методу шлюза ограничен, обратитесь в службу поддержки RUNET-ID',
        105 => 'Аккаунт заблокирован',
        106 => 'Не реализовано',

        109 => 'Не задан обязательный параметр метода: %s',
        110 => 'Не задан обязательный параметр метода',
        111 => 'Не верный токен следующей страницы данных',
        112 => 'Неверный формат даты в параметре %s. Ожидалось YYYY-MM-DD HH:MM:SS',

        /* Ошибки работы с модулем User */
        201 => 'Не удалось авторизовать пользователя',
        202 => 'Не найден пользователь с RUNET-ID: %s',

        203 => 'Строка запроса не может быть пустой',

        204 => 'Ошибка регистрации пользователя: %s',
        205 => 'Введен не корректный Email',
        206 => 'Пользователь с таким Email уже существует в системе RUNET-ID',
        207 => 'Ошибка редактирования пользователя: %s',

        208 => 'Пользователь, удовлетворяющий условиям поиска не найден',
        210 => 'Не найден пользователь с Email: %s',
        211 => 'Не найден пользователь с логином: %s',
        212 => 'Не найден пользователь с ExternalID: %s',

        220 => 'Не найдена связь с соц. сервисом',
        221 => 'Не найден соц. сервис',

        222 => 'Неверный токен авторизации пользователя',
        223 => 'Токен авторизации не соответствует аккаунту в API',
        224 => 'Не найден пользователь, соответствующий полученному токену',

        230 => 'Нет доступа для редактирования пользователя с RUNET-ID: %s',
        231 => 'Нет доступа для получения профиля пользователя с RUNET-ID: %s',

        241 => 'Не найдена компания с ID: %s',

        251 => 'Возникла ошибка при работе с аттрибутами пользователя: "%s"',

        /* Ошибки работы с модулем Event */
        301 => 'Не найдено мероприятие для текущего аккаунта',
        302 => 'Не найдена роль %d',
        303 => 'Пользователь уже зарегистрирован на мероприятие',
        304 => 'Пользователь не зарегистрирован на мероприятие',
        305 => 'Роль пользователя не изменилась на мероприятии',
        306 => 'На мероприятии отсутствует день с id: %s',
        307 => 'Пользователь уже зарегистрирован на мероприятие',
        308 => 'Для мероприятия не заданы отдельные дни. Указан избыточный праметр.',
        309 => 'Для мероприятия заданы отдельные дни. Необходимо указать id дня.',

        310 => 'Не найдена секция с идентификатором %s',
        311 => 'Идентификатор запрашиваемой секции не соответствует мероприятию',

        /* Ошибки работы с модулем Pay */
        401 => 'Не найден продукт с id: %s',
        402 => 'Идентификатор мероприятия и идентификатор продукта не совпадают',
        403 => 'Данный товар не может быть приобретен этим пользователем. Возможно уже куплен этот или аналогичный товар',
        405 => 'Вы уже заказали этот товар',

        406 => 'Указанный промо-код введен некорректно или не существует',
        407 => 'Указанный промо-кода предназначен для другого мероприятия',

        408 => 'Ошибка в модуле Pay. Code: %s Message: %s',

        self::PAY_EXCEPTION_PREFIX => 'Технический код для аггрегации ошибок из модуля Pay',

        409 => 'Не найден элемент заказа с таким идентификатором',
        410 => 'Ошибка при удалении. Попытка удалить заказ, принадлежащий другому пользователю',
        411 => 'Данный элемент заказ уже оплачен. Вы не можете удалить уже оплаченые товары',
        412 => 'Данный элемент заказа включен в выписанный счет и не может быть удален',

        420 => 'Не найдено ни одного продукта с заданными параметрами',

        /*** ошибки работы с новостями  */
        501 => 'Не найдена новость с id: %s',

        /* Ошибка работы с модулем Commission */
        601 => 'Не найдена комиссия с id: %s',

        /* Ошибка работы с Event Invite */
        701 => 'Пользователь с RUNET-ID %s уже подал запрос на участие',
        702 => 'Пользователь с RUNET-ID %s не подавал запрос на участие',

        /* Ошибка работы с Event Purpose */
        801 => 'Цель посещения с ID:%s не найдена',

        /* Ошибка работы с User Professional Interests */
        901 => 'Профессиональный интерес ID:%s не найдена',

        /* Ошибки работы с документами пользователя */
        1000 => 'Документ не найден',
        1001 => 'Тип документа не найден %S',
        1002 => 'Ошибка сохранения документа',

        /** Спецпроекты */
        2001 => 'Пользователь с RUNET-ID %s не является участником РИФ+КИБ 2013',

        /** Ошибки методов интеграции с MicroSoft  */
        3002 => 'Пользователь с внешним Id %s уже добавлен в RUNET-ID',
        3003 => 'Пользователь с внешним Id %s не найден в RUNET-ID',
        3004 => 'Отсутствует обязательный параметр "%s"',
        3005 => 'Не найдена роль с Id %s',
        3006 => 'Не корректный промо-код',
        3007 => 'Не найден внешний Id для пользователя %s',
        3008 => 'Не удалось обновить аватарку пользователю %s',

        /** Competence */
        3009 => 'Не удалось найти результатов для пользователя %s',

        /* ОШибки работы с модулем деловых встреч */
        4001 => 'Не найдена встреча c ID: %s',
        4002 => 'Не удалось зарезервировать переговорную комнату'
    ];

    /**
     * @param int $code
     * @param array $params
     * @return string
     */
    protected function getErrorMessage($code, $params = [])
    {
        $message = isset($this->codes[$code])
            ? \Yii::t('api', $this->codes[$code])
            : 'Возникла ошибка с неизвестным кодом.';

        return vsprintf($message, $params);
    }

    public function sendResponse()
    {
        $error = new \stdClass();
        $previous = $this->getPrevious();
        if (is_a($previous, 'pay\components\Exception')) {
            $error->Code = self::PAY_EXCEPTION_PREFIX + $previous->getCode();
            $error->Message = $previous->getMessage();
            if ($this->data !== null) {
                $error->Fields = $this->data;
            }
        } else {
            $error->Code = $this->getCode();
            $error->Message = $this->getMessage();
            if ($this->data !== null) {
                $error->Fields = $this->data;
            }
        }
        echo json_encode(['Error' => $error], JSON_UNESCAPED_UNICODE);
    }
}
