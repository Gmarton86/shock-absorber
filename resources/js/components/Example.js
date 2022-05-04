import React, { useState } from "react";
import ReactDOM from "react-dom";
import { useTranslation } from "react-i18next";
import "../../../config/i18n";
import axios from "axios";

function Example() {
    const [rub, setRub] = useState(0);
    const [command, setCommand] = useState("");
    const [commnadResponse, setCommandResponse] = useState("");
    const [rubResponse, setRubResponse] = useState("");

    const handleSubmitCommand = (e) => {
        e.preventDefault();
        // axios.get('/command').then(response => {
        //     setCommandResponse(response.data)
        // }).catch(console.log)
        console.log(command);
    };

    const handleSubmitRub = (e) => {
        e.preventDefault();
        // axios.get('/rub').then(response => {
        //     setRubResponse(response.data)
        // }).catch(console.log)
        console.log(rub);
    }

    const { t } = useTranslation();
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg">
                    <form className="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                        <div className="flex flex-wrap -mx-3 mb-6">
                            <h2 className="px-4 pt-3 pb-2 text-gray-800 text-lg">
                                {t("SEND_REQUEST")}
                            </h2>
                            <div className="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea
                                    className="bg-gray-100 text-black rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                    name="body"
                                    placeholder={t("REQUEST_PLACEHOLDER")}
                                    required
                                    onChange={(e) => setCommand(e.target.value)}
                                ></textarea>
                            </div>
                            <div className="w-full md:w-full flex items-start md:w-full px-3">
                                <div className="-mr-1">
                                    <input
                                        type="button"
                                        onClick={(e) => handleSubmitCommand(e)}
                                        className="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                        value={t("SUBMIT")}
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div className="mt-5">
                    <div className="rounded-full bg-white shadow flex w-full">
                        <input
                            type="number"
                            placeholder={t("R_PLACEHOLDER")}
                            className={
                                "w-full rounded-tl-full rounded-bl-full py-2 px-4 text-black"
                            }
                            onChange={(e) => setRub(e.target.value)}
                        />
                        <button
                            className="bg-yellow-300 rounded-tr-full rounded-br-full hover:bg-red-300 py-2 px-4"
                            onClick={(e) => handleSubmitRub(e)}
                        >
                            <p className="font-semibold text-base uppercase">
                                {t("SUBMIT")}
                            </p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
