import React from "react";
import ReactDOM from "react-dom";
import { useTranslation } from "react-i18next";
import "../../../config/i18n";

function Example() {
    const { t } = useTranslation();
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header text-white">
                            {t("INIT")}
                        </div>
                        <div>NAZDÁREK</div>
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
