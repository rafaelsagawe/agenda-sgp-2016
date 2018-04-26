/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sistema;

import java.beans.PropertyChangeListener;
import java.beans.PropertyChangeSupport;
import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Transient;

/**
 *
 * @author ti.semed
 */
@Entity
@Table(name = "agenda_sgp", catalog = "db_semed", schema = "")
@NamedQueries({
    @NamedQuery(name = "AgendaSgp.findAll", query = "SELECT a FROM AgendaSgp a"),
    @NamedQuery(name = "AgendaSgp.findByAgendaId", query = "SELECT a FROM AgendaSgp a WHERE a.agendaId = :agendaId"),
    @NamedQuery(name = "AgendaSgp.findByAgendaData", query = "SELECT a FROM AgendaSgp a WHERE a.agendaData = :agendaData"),
    @NamedQuery(name = "AgendaSgp.findByAgendaHorario", query = "SELECT a FROM AgendaSgp a WHERE a.agendaHorario = :agendaHorario"),
    @NamedQuery(name = "AgendaSgp.findByAgendaPublico", query = "SELECT a FROM AgendaSgp a WHERE a.agendaPublico = :agendaPublico"),
    @NamedQuery(name = "AgendaSgp.findByAgendaEvento", query = "SELECT a FROM AgendaSgp a WHERE a.agendaEvento = :agendaEvento"),
    @NamedQuery(name = "AgendaSgp.findByAgendaEquipe", query = "SELECT a FROM AgendaSgp a WHERE a.agendaEquipe = :agendaEquipe"),
    @NamedQuery(name = "AgendaSgp.findByAgendaLocal", query = "SELECT a FROM AgendaSgp a WHERE a.agendaLocal = :agendaLocal"),
    @NamedQuery(name = "AgendaSgp.findByAgendaSuporte", query = "SELECT a FROM AgendaSgp a WHERE a.agendaSuporte = :agendaSuporte")})
public class AgendaSgp implements Serializable {
    @Transient
    private PropertyChangeSupport changeSupport = new PropertyChangeSupport(this);
    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "agenda_id")
    private Integer agendaId;
    @Column(name = "agenda_data")
    private String agendaData;
    @Column(name = "agenda_horario")
    private String agendaHorario;
    @Column(name = "agenda_publico")
    private String agendaPublico;
    @Column(name = "agenda_evento")
    private String agendaEvento;
    @Column(name = "agenda_equipe")
    private String agendaEquipe;
    @Column(name = "agenda_local")
    private String agendaLocal;
    @Column(name = "agenda_suporte")
    private String agendaSuporte;

    public AgendaSgp() {
    }

    public AgendaSgp(Integer agendaId) {
        this.agendaId = agendaId;
    }

    public Integer getAgendaId() {
        return agendaId;
    }

    public void setAgendaId(Integer agendaId) {
        Integer oldAgendaId = this.agendaId;
        this.agendaId = agendaId;
        changeSupport.firePropertyChange("agendaId", oldAgendaId, agendaId);
    }

    public String getAgendaData() {
        return agendaData;
    }

    public void setAgendaData(String agendaData) {
        String oldAgendaData = this.agendaData;
        this.agendaData = agendaData;
        changeSupport.firePropertyChange("agendaData", oldAgendaData, agendaData);
    }

    public String getAgendaHorario() {
        return agendaHorario;
    }

    public void setAgendaHorario(String agendaHorario) {
        String oldAgendaHorario = this.agendaHorario;
        this.agendaHorario = agendaHorario;
        changeSupport.firePropertyChange("agendaHorario", oldAgendaHorario, agendaHorario);
    }

    public String getAgendaPublico() {
        return agendaPublico;
    }

    public void setAgendaPublico(String agendaPublico) {
        String oldAgendaPublico = this.agendaPublico;
        this.agendaPublico = agendaPublico;
        changeSupport.firePropertyChange("agendaPublico", oldAgendaPublico, agendaPublico);
    }

    public String getAgendaEvento() {
        return agendaEvento;
    }

    public void setAgendaEvento(String agendaEvento) {
        String oldAgendaEvento = this.agendaEvento;
        this.agendaEvento = agendaEvento;
        changeSupport.firePropertyChange("agendaEvento", oldAgendaEvento, agendaEvento);
    }

    public String getAgendaEquipe() {
        return agendaEquipe;
    }

    public void setAgendaEquipe(String agendaEquipe) {
        String oldAgendaEquipe = this.agendaEquipe;
        this.agendaEquipe = agendaEquipe;
        changeSupport.firePropertyChange("agendaEquipe", oldAgendaEquipe, agendaEquipe);
    }

    public String getAgendaLocal() {
        return agendaLocal;
    }

    public void setAgendaLocal(String agendaLocal) {
        String oldAgendaLocal = this.agendaLocal;
        this.agendaLocal = agendaLocal;
        changeSupport.firePropertyChange("agendaLocal", oldAgendaLocal, agendaLocal);
    }

    public String getAgendaSuporte() {
        return agendaSuporte;
    }

    public void setAgendaSuporte(String agendaSuporte) {
        String oldAgendaSuporte = this.agendaSuporte;
        this.agendaSuporte = agendaSuporte;
        changeSupport.firePropertyChange("agendaSuporte", oldAgendaSuporte, agendaSuporte);
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (agendaId != null ? agendaId.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof AgendaSgp)) {
            return false;
        }
        AgendaSgp other = (AgendaSgp) object;
        if ((this.agendaId == null && other.agendaId != null) || (this.agendaId != null && !this.agendaId.equals(other.agendaId))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "telas.AgendaSgp[ agendaId=" + agendaId + " ]";
    }

    public void addPropertyChangeListener(PropertyChangeListener listener) {
        changeSupport.addPropertyChangeListener(listener);
    }

    public void removePropertyChangeListener(PropertyChangeListener listener) {
        changeSupport.removePropertyChangeListener(listener);
    }
    
}
