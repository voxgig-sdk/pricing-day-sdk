package core

type PricingDayError struct {
	IsPricingDayError bool
	Sdk              string
	Code             string
	Msg              string
	Ctx              *Context
	Result           any
	Spec             any
}

func NewPricingDayError(code string, msg string, ctx *Context) *PricingDayError {
	return &PricingDayError{
		IsPricingDayError: true,
		Sdk:              "PricingDay",
		Code:             code,
		Msg:              msg,
		Ctx:              ctx,
	}
}

func (e *PricingDayError) Error() string {
	return e.Msg
}
